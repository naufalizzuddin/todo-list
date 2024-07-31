<?php

$db = mysqli_connect("localhost", "root", "", "todo")
  or
  die("Koneksi gagal: " . mysqli_connect_error());