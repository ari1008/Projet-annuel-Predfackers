<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use APP\Table\User;
$user_table = new User();
$users = $user_table->ViewUserAll();
$column_name = array("Id", "Nom", "Prenom", "Email", "Pseudo", "Date de naissance");
?>

<a class="btn btn-primary btn-sm" href="<?php echo '?p=createUser'; ?>">Nouvel User</a>
<table border="1" class="table table-bordered">
	<thead>
		<tr>
			<?php foreach ($column_name as $column): ?>
				<th><?php echo $column; ?></th>
			<?php endforeach; ?>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $user): ?>
			<tr>
				<td><a class="btn btn-primary" href="<?php echo '?p=editUser&user_id='.$user['id_user']; ?>"><?php echo $user['id_user']; ?></a></td>
				<td><?php echo $user['last_name']; ?></td>
				<td><?php echo $user['first_name']; ?></td>
				<td><?php echo $user['email']; ?></td>
				<td><?php echo $user['username']; ?></td>
				<td><?php echo $user['date_birth']; ?></td>
                <td><a class="btn btn-primary" href="<?php echo '?p=deleteUser&user_id='.$user['id_user']; ?>">Supprimer</a></td>
			</tr>
		<?php endforeach ?>
	</tbody>

</table>