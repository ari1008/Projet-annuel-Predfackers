<?php
use APP\Table\User;
$user_table = new User();
$users = $user_table->ViewUserAll();
$column_name = array("Id", "Nom", "Prenom", "Email", "Pseudo", "Date de naissance");
?>

<table border="1">
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
				<td><a href="<?php echo '?p=editUser&user_id='.$user['id_user']; ?>"><?php echo $user['id_user']; ?></a></td>
				<td><?php echo $user['last_name']; ?></td>
				<td><?php echo $user['first_name']; ?></td>
				<td><?php echo $user['email']; ?></td>
				<td><?php echo $user['username']; ?></td>
				<td><?php echo $user['date_birth']; ?></td>
                <td><a href="<?php echo '?p=deleteUser&user_id='.$user['id_user']; ?>">Suppprimer</a></td>
			</tr>
		<?php endforeach ?>
	</tbody>

</table>