<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<hr />
    <center>
        @if(session('pesan'))
        <div class="alert alert-success">
            {{ session('pesan') }}
        </div>
        @endif

    <h2>TABEL MAHASISWA</h2>
    <hr />

    <section>
    <!-- Table -->
    <table class="table table-striped w-auto">
        <!--Table head-->
        <thead class="thead-dark">
            <tr>
                <th></th>
                <th>NIM</th>
                <th>NAMA</th>
                <th>UMUR</th>
                <th>EMAIL</th>
                <th>ALAMAT</th>
                <th>CREATED AT</th>
                <th>UPDATED AT</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <!-- Table head-->

        <!-- Table body -->
        <tbody>
            <?php
            $num = 1;
            foreach ($dataAll as $datax) {
                if(($num % 2) == 1) {echo "<tr class='table-info'>";} else echo "<tr>";
                echo '<th scope="row">' . $num . '</th>';
                echo '<td>';
                    echo $datax->nim; 
                echo '</td>';

                echo '<td>';
                    echo $datax->nama; 
                echo '</td>';

                echo '<td>';
                    echo $datax->umur; 
                echo '</td>';

                echo '<td>';
                    echo $datax->email; 
                echo '</td>';

                echo '<td>';
                    echo $datax->alamat; 
                echo '</td>';

                echo '<td>';
                    echo $datax->created_at; 
                echo '</td>';
                
                echo '<td>';
                    echo $datax->updated_at; 
                echo '</td>';
            
                echo '<td>';
                echo '<a href="/delete/' . $datax->nim . '" onclick="return confirm(\'Yakin mau dihapus ?\');" class="btn btn-danger">HAPUS</a>';
                echo '<a href="/update/' . $datax->nim . '" onclick="return confirm(\'Yakin data mau diedit/diupdate ?\');" class="btn btn-success">UPDATE</a>';
                echo '</td>';
                echo '</tr>';
                $num++;
            }
            ?>
        </tbody>
        </table>
    </section>
    <a href='/create' class='btn btn-primary'> Tambah Data </a>
    </center>
        <hr />