<?php
if( $_SERVER['REQUEST_METHOD']=='POST' )
{
        var_dump( $_FILES );//apenas para debug


        $servidor = 'ftp.shoelbriegel.com';
        $local = $_POST['local'];



        $caminho = 'images/uploads/';
        $caminho_absoluto = $caminho;
        $arquivo = $_FILES['arquivo'];

        $con_id = ftp_connect($servidor) or die( 'Nao conectou em: '.$servidor );
        ftp_login( $con_id, 'u313230586', 'stephhoel1996' );

        ftp_put( $con_id, $caminho_absoluto.$arquivo['name'], $arquivo['tmp_name'], FTP_BINARY );
}
?>
        <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="arquivo" />
                <br/>
                <input type="text" name="local" />
					 <br/>
                <input type="submit" name="enviar" value="Enviar" />
        </form>