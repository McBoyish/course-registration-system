
<!DOCTYPE html>
<html xmlns = "http://www.w3.org/1999/xhtml">
    <head>
        <title>Login Administrator</title>
    <style type = "text/css">
            body  { font-family: arial, sans-serif;
                    background-color: #F0E68C } 
            table { background-color: #ADD8E6 }
            td    { padding-top: 2px;
                    padding-bottom: 2px;
                    padding-left: 4px;
                    padding-right: 4px;
                    border-width: 1px;
                    border-style: inset }
        </style>
    </head>
    <body>
        <?php
            extract($_GET);
            //firstName, lastName, employmentID

            // build SELECT query
            $query="SELECT employmentID FROM administrator";

            // Connect to MySQL
            if ( !( $database = mysqli_connect( "localhost",
            "root", "" ) ) )                      
            die( "Could not connect to database </body></html>" );
    
            // open Products database
            if ( !mysqli_select_db( $database ,"Assignment1" ) )
            die( "Could not open products database </body></html>" );
        
            // query Products database
            if ( !( $result = mysqli_query( $database,$query) ) ) 
            {
            print( "Could not execute query! <br />" );
            die( mysqli_error($database) . "</body></html>" );
            } // end if
        else
        {
            print($database);
        }
            mysqli_close( $database );
        ?><!-- end PHP script -->
        
    </body>
</html>