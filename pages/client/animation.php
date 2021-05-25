<div style="text-align:center">Dirigez - vous ver une porte et Appuyer sur E
    <p id="info" ></p></div>
<div id="blocker">

    <div id="instructions">
        <span style="font-size:36px">Click to play</span>
        <br /><br />
        Move: WASD<br/>
        Jump: SPACE<br/>
        Look: MOUSE
    </div>

</div>

<script type="module">
    import * as THREE from   '../../Projet-annuel-Predfackers/threeJS/build/three.module.js';

    //pour les object
    import {GLTFLoader} from  '../../Projet-annuel-Predfackers/threeJS/examples/jsm/loaders/GLTFLoader.js';

    //Deplacement du personnage (cam) /var/www/three/Projet-annuel-Predfackers/threeJS/examples/jsm/controls/PointerLockControls.js
    import { PointerLockControls } from  '../../Projet-annuel-Predfackers/threeJS/examples/jsm/controls/PointerLockControls.js';

    //ciel
    import { Sky } from '../../Projet-annuel-Predfackers/threeJS/examples/jsm/objects/Sky.js';

    //Variable publique modifiable par l'utilisateur (graphique interface user)
    import { GUI } from '../../Projet-annuel-Predfackers/threeJS/examples/jsm/libs/dat.gui.module.js';

    //Stat
    import Stats from '../../Projet-annuel-Predfackers/threeJS/examples/jsm/libs/stats.module.js';

    let camera, scene, renderer,clock, controls,sky, sun;
    var stats;


    const objects = [];

    let raycaster;
    //PointerLock
    let moveForward = false;
    let moveBackward = false;
    let moveLeft = false;
    let moveRight = false;
    let canJump = false;
    let UseE = false;

    let prevTime = performance.now();
    const velocity = new THREE.Vector3();
    const direction = new THREE.Vector3();

    clock = new THREE.Clock();

    function initSky() {

        // Add Sky
        sky = new Sky();
        sky.scale.setScalar( 450000 );
        scene.add( sky );

        sun = new THREE.Vector3();

        /// GUI

        const effectController = {
            turbidity: 10,
            rayleigh: 3,
            mieCoefficient: 0.005,
            mieDirectionalG: 0.7,
            elevation: 2,
            azimuth: 180,
            exposure: renderer.toneMappingExposure
        };

        function guiChanged() {

            const uniforms = sky.material.uniforms;
            uniforms[ 'turbidity' ].value = effectController.turbidity;
            uniforms[ 'rayleigh' ].value = effectController.rayleigh;
            uniforms[ 'mieCoefficient' ].value = effectController.mieCoefficient;
            uniforms[ 'mieDirectionalG' ].value = effectController.mieDirectionalG;

            const phi = THREE.MathUtils.degToRad( 90 - effectController.elevation );
            const theta = THREE.MathUtils.degToRad( effectController.azimuth );

            sun.setFromSphericalCoords( 1, phi, theta );

            uniforms[ 'sunPosition' ].value.copy( sun );

            renderer.toneMappingExposure = effectController.exposure;
            renderer.render( scene, camera );

        }

        const gui = new GUI();

        gui.add( effectController, 'turbidity', 0.0, 20.0, 0.1 ).onChange( guiChanged );
        gui.add( effectController, 'rayleigh', 0.0, 4, 0.001 ).onChange( guiChanged );
        gui.add( effectController, 'mieCoefficient', 0.0, 0.1, 0.001 ).onChange( guiChanged );
        gui.add( effectController, 'mieDirectionalG', 0.0, 1, 0.001 ).onChange( guiChanged );
        gui.add( effectController, 'elevation', 0, 90, 0.1 ).onChange( guiChanged );
        gui.add( effectController, 'azimuth', - 180, 180, 0.1 ).onChange( guiChanged );
        gui.add( effectController, 'exposure', 0, 1, 0.0001 ).onChange( guiChanged );

        guiChanged();

    }


    function createStats() {
        var stats = new Stats();
        stats.setMode(0);

        stats.domElement.style.position = 'absolute';
        stats.domElement.style.left = '0';
        stats.domElement.style.top = '0';

        return stats;
    }


    const manager = new THREE.LoadingManager();
    manager.onStart = function ( url, itemsLoaded, itemsTotal ) {

        console.log( 'Started loading file: ' + url + '.\nLoaded ' + itemsLoaded + ' of ' + itemsTotal + ' files.' );

    };

    manager.onLoad = function ( ) {

        console.log( 'Loading complete!');

    };


    manager.onProgress = function ( url, itemsLoaded, itemsTotal ) {

        console.log( 'Loading file: ' + url + '.\nLoaded ' + itemsLoaded + ' of ' + itemsTotal + ' files.' );

    };

    manager.onError = function ( url ) {

        console.log( 'There was an error loading ' + url );

    };
    function tree(z,x){
        //gltf temple

        // Instantiate a loader
        const loadertemple = new GLTFLoader(manager);

        // Load a glTF resource
        loadertemple.load(
            // resource URL
            '../../Projet-annuel-Predfackers/threeJS/examples/Object/tree/scene.gltf',
            // called when the resource is loaded
            function ( gltf ) {
                var tree = gltf.scene
                scene.add( tree );

                gltf.animations; // Array<THREE.AnimationClip>
                gltf.scene; // THREE.Group
                gltf.scenes; // Array<THREE.Group>
                gltf.cameras; // Array<THREE.Camera>
                gltf.asset; // Object
                tree.position.z = z;
                tree.position.y = -10;
                tree.position.x = x;
                var scale = 0.05;
                tree.scale.set(scale,scale,scale);

            });
    }

    function bench(z,x){
        //gltf temple

        // Instantiate a loader
        const loadertemple = new GLTFLoader(manager);

        // Load a glTF resource
        loadertemple.load(
            // resource URL
            '../../Projet-annuel-Predfackers/threeJS/examples/Object/bench/scene.gltf',
            // called when the resource is loaded
            function ( gltf ) {
                var bench = gltf.scene
                scene.add( bench );

                gltf.animations; // Array<THREE.AnimationClip>
                gltf.scene; // THREE.Group
                gltf.scenes; // Array<THREE.Group>
                gltf.cameras; // Array<THREE.Camera>
                gltf.asset; // Object
                bench.position.z = z;
                bench.position.y = -5;
                bench.position.x = x;
                var scale = 4;
                bench.scale.set(scale,scale,scale);

            });
    }

    function shop1(z,x){
        //gltf temple

        // Instantiate a loader
        const loadertemple = new GLTFLoader(manager);

        // Load a glTF resource
        loadertemple.load(
            // resource URL
            '../../Projet-annuel-Predfackers/threeJS/examples/Object/shop1/scene.gltf',
            // called when the resource is loaded
            function ( gltf ) {
                var shop = gltf.scene
                scene.add( shop );

                gltf.animations; // Array<THREE.AnimationClip>
                gltf.scene; // THREE.Group
                gltf.scenes; // Array<THREE.Group>
                gltf.cameras; // Array<THREE.Camera>
                gltf.asset; // Object
                shop.position.z = z;
                shop.position.y = 30;
                shop.position.x = x;
                var scale = 0.05;
                shop.scale.set(scale,scale,scale);

            });
    }

    function shop2(z,x){
        //gltf temple

        // Instantiate a loader
        const loadertemple = new GLTFLoader(manager);

        // Load a glTF resource
        loadertemple.load(
            // resource URL
            '../../Projet-annuel-Predfackers/threeJS/examples/Object/shop2jap/scene.glb',
            // called when the resource is loaded
            function ( gltf ) {
                var shop = gltf.scene
                shop.traverse( function ( node ) {

                    if ( node.isMesh || node.isLight ) node.castShadow = true;
                    if ( node.isMesh || node.isLight ) node.receiveShadow = true;

                } );
                scene.add( shop );

                gltf.animations; // Array<THREE.AnimationClip>
                gltf.scene; // THREE.Group
                gltf.scenes; // Array<THREE.Group>
                gltf.cameras; // Array<THREE.Camera>
                gltf.asset; // Object
                shop.position.z = z;
                shop.position.y = -5;
                shop.position.x = x;
                var scale = 0.15;
                shop.scale.set(scale,scale,scale);

            });
    }


    init();
    animate();

    function init() {

        shop2(50,-25);
        shop1(0,30);
        bench(17,5);
        for (let i = 0; i < 2; i++) {
            for (let j = 0; j < 2 ; j++) {
                tree(i*100,j*100);
            }
        }




        stats=createStats();
        document.body.appendChild(stats.domElement);

        camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 1, 1000 );
        camera.position.y = 15;
        camera.position.x = 50;
        camera.position.z = 50;

        scene = new THREE.Scene();
        scene.background = new THREE.Color( 0xffffff );
        scene.fog = new THREE.Fog( 0xffffff, 0, 750 );

        const light = new THREE.HemisphereLight( 0xeeeeff, 0x777788, 0.75 );
        light.position.set( 0.5, 1, 0.75 );
        scene.add( light );

        controls = new PointerLockControls( camera, document.body );

        const blocker = document.getElementById( 'blocker' );
        const instructions = document.getElementById( 'instructions' );

        instructions.addEventListener( 'click', function () {

            controls.lock();

        } );

        controls.addEventListener( 'lock', function () {

            instructions.style.display = 'none';
            blocker.style.display = 'none';

        } );

        controls.addEventListener( 'unlock', function () {

            blocker.style.display = 'block';
            instructions.style.display = '';

        } );

        scene.add( controls.getObject() );

        const onKeyDown = function ( event ) {

            switch ( event.code ) {

                case 'ArrowUp':
                case 'KeyW':
                    moveForward = true;
                    break;

                case 'ArrowLeft':
                case 'KeyA':
                    moveLeft = true;
                    break;

                case 'ArrowDown':
                case 'KeyS':
                    moveBackward = true;
                    break;

                case 'ArrowRight':
                case 'KeyD':
                    moveRight = true;
                    break;

                case 'Space':
                    if ( canJump === true ) velocity.y += 350;
                    canJump = false;
                    break;

                case 'KeyE': //e
                    UseE = true;
                    break;

            }

        };

        const onKeyUp = function ( event ) {

            switch ( event.code ) {

                case 'ArrowUp':
                case 'KeyW':
                    moveForward = false;
                    break;

                case 'ArrowLeft':
                case 'KeyA':
                    moveLeft = false;
                    break;

                case 'ArrowDown':
                case 'KeyS':
                    moveBackward = false;
                    break;

                case 'ArrowRight':
                case 'KeyD':
                    moveRight = false;
                    break;

                case 'KeyE': //e
                    UseE = false;
                    break;

            }

        };

        document.addEventListener( 'keydown', onKeyDown );
        document.addEventListener( 'keyup', onKeyUp );

        raycaster = new THREE.Raycaster( new THREE.Vector3(), new THREE.Vector3( 0, - 1, 0 ), 0, 10 );

        //Floor
        const grass = new THREE.TextureLoader().load('../../Projet-annuel-Predfackers/threeJS/examples/textures/pave.jpg');
        grass.wrapS = THREE.RepeatWrapping;
        grass.wrapT = THREE.RepeatWrapping;
        grass.repeat.set(25, 25);
        var geometry = new THREE.PlaneGeometry(2000, 2000, 1, 1);
        var material = new THREE.MeshBasicMaterial({texture: grass, side: THREE.DoubleSide});
        var material = new THREE.MeshLambertMaterial({map: grass, side: THREE.DoubleSide});
        var ground = new THREE.Mesh(geometry, material);
        // Rotate the place to ground level
        ground.rotation.x = Math.PI / 2;
        ground.position.y = -10;
        ground.castShadow = true;
        ground.receiveShadow = true;
        scene.add(ground);


        renderer = new THREE.WebGLRenderer( { antialias: true } );
        renderer.setPixelRatio( window.devicePixelRatio );
        renderer.setSize( window.innerWidth, window.innerHeight );
        renderer.outputEncoding = THREE.sRGBEncoding;
        renderer.toneMapping = THREE.ACESFilmicToneMapping;
        renderer.toneMappingExposure = 0.5;
        document.body.appendChild( renderer.domElement );


        initSky();

        window.addEventListener( 'resize', onWindowResize );

    }

    function onWindowResize() {

        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();

        renderer.setSize( window.innerWidth, window.innerHeight );

    }

    function animate() {

        requestAnimationFrame( animate );

        const time = performance.now();

        if ( controls.isLocked === true ) {

            raycaster.ray.origin.copy( controls.getObject().position );
            raycaster.ray.origin.y -= 10;

            const intersections = raycaster.intersectObjects( objects );

            const onObject = intersections.length > 0;

            const delta = ( time - prevTime ) / 1000;

            velocity.x -= velocity.x * 10.0 * delta;
            velocity.z -= velocity.z * 10.0 * delta;

            velocity.y -= 9.8 * 100.0 * delta; // 100.0 = mass

            direction.z = Number( moveForward ) - Number( moveBackward );
            direction.x = Number( moveRight ) - Number( moveLeft );
            direction.normalize(); // this ensures consistent movements in all directions

            if ( moveForward || moveBackward ) velocity.z -= direction.z * 400.0 * delta;
            if ( moveLeft || moveRight ) velocity.x -= direction.x * 400.0 * delta;

            if ( onObject === true ) {

                velocity.y = Math.max( 0, velocity.y );
                canJump = true;

            }

            controls.moveRight( - velocity.x * delta );
            controls.moveForward( - velocity.z * delta );

            controls.getObject().position.y += ( velocity.y * delta ); // new behavior

            if ( controls.getObject().position.y < 10 ) {

                velocity.y = 0;
                controls.getObject().position.y = 10;

                canJump = true;

            }


        }
        //Message POP UP
        if(Math.pow((-7) - camera.position.x, 2) < 500 && Math.pow((35) - camera.position.z, 2) < 500)
        {
            //window.alert('Si Vous cliqué sur E vers la porte du magasin Jap');
            var texte = document.getElementById("info");
            //console.log(texte.innerHTML);

            texte.innerHTML = "Voici la porte pour se TP au smartphone";

        }
        if(Math.pow((76) - camera.position.x, 2) < 500 && Math.pow((13) - camera.position.z, 2) < 500)
        {
            //window.alert('Si Vous cliqué sur E vers la porte du magasin Jap');
            var texte = document.getElementById("info");
            //console.log(texte.innerHTML);

            texte.innerHTML = "Voici la porte pour se TP au Aspirateur";

        }
        if(Math.pow((37) - camera.position.x, 2) < 500 && Math.pow((13) - camera.position.z, 2) < 500)
        {
            //window.alert('Si Vous cliqué sur E vers la porte du magasin Jap');
            var texte = document.getElementById("info");
            //console.log(texte.innerHTML);

            texte.innerHTML = "Voici la porte pour se TP au Ordinateur";

        }

        if (UseE == true) {
            console.log(camera.position);

            /*if (Math.pow((-7) - camera.position.x, 2) < 200 && Math.pow((35) - camera.position.z, 2) < 200)
            {
                console.log(camera.position);
            }
            if (Math.pow((-2.1) - camera.position.x, 2) < 200 && Math.pow((-281.4) - camera.position.z, 2) < 200)
            {
                console.log(camera.position);
            }*/
        }

        prevTime = time;
        stats.update();
        renderer.render( scene, camera );

    }

</script>