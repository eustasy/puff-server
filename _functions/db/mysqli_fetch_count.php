<?php

function mysqli_fetch_count($connection, $sql) {
	$result = mysqli_query($connection, $sql);
	if ( $result ) {
		return mysqli_num_rows($result);
	} else {
		return false;
	}
}
