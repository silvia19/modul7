<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!-- 
Algoritma :
1. Start
2. Menampilkan data berupa tabel
3. Jika ingin sorting nim, nama, dan alamat data bisa terurut sesuai dengan data yang ingin di sorting
4. Data terurut
5. End
-->
	<head>
        <title>Tugas Praktikum</title>
    </head>

    <body>
    <center><h2>Data Siswa</h2>
    <table border="4" cellspacing="0" cellpadding="5" align="center">
    <tr>
    <center><td>No.</td></center>
    <?php
     $sort = isset($_GET['sort']) ? $_GET['sort'] : 'ASC';
     if($sort=='ASC'){
        $temp='DESC';
        $sort=$temp;
    }else{
        $temp='ASC';
        $sort=$temp;
    }
        echo '<td width="100"><center><a href="'.@$self.'?kolom=nim&&sort='.$sort.'">NIM</a></center></td>';
        echo '<td width="150"><center><a href="'.@$self.'?kolom=nama&&sort='.$sort.'">Nama</a></center></td>';
        echo '<td><center><a href="'.@$self.'?kolom=alamat&&sort='.$sort.'">Alamat</a></center></td>';
    ?>
    </tr>
    <?php
    require_once "./koneksi.php";
        $kolom = isset($_GET['kolom']) ? $_GET['kolom'] : '';
        if($kolom=='' || $sort==''){
        $sql='SELECT * FROM mahasiswa';
        }else{
			$sql='SELECT * FROM mahasiswa ORDER BY '.$kolom.' '.$sort;
        }
            $res = mysql_query($sql);
            $i=1;
            if($res){
				while($row=mysql_fetch_row($res)){?>
                <tr>
    <td><?php echo $i;?></td>
		<td width="100"><?php echo $row[0];?></td>
        <td width="150"><?php echo $row[1];?></td>
        <td><?php echo $row[2];?></td>
    </tr>
    <?php
    $i++;
    }        
    }
    ?>
    </table>
	</center>
    </body>
</html>