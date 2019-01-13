
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>test</title>
    <!-- Latest compiled and minified CSS -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <h2 align="center">BLOCKCHAIN</h2>
        
        <table class="table" >
            <thead style="font-size: 15px;">
              <tr>
                <th>Height</th>
                <th>Hash</th>
                <th>Previous Hash</th>
                <th>Nonce</th>
                <th>Timestamp</th>
              </tr>
            </thead>
            <tbody style="font-size: 13px;">
            	<?php
            	foreach ($data as $row){ 
		  ?>
              <tr>
                <td><?php echo $row['height']; ?></td>
                <td><?php echo $row['hash']; ?></td>
                <td><?php echo $row['preHash']; ?></td>
                <td><?php echo $row['nonce']; ?></td>
                <td><?php echo date('m/d/Y h:i:s a', $row['timest']); ?></td>
                <td>
                    <a data-id="<?php echo $row['height']?>" class="btn btn-success detail">Detail</a>
                </td>
              </tr>
                
                <?php } ?>
            </tbody>
          </table>
          <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">

                    <h2 class="modal-title">DATA IN BLOCK</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <ul id="detail">

                    </ul>
                    
                    <div class="modal-footer">

                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                    
                  </div>
                </div>

              </div>
            </div>

    </div>

    <script>
  $(document).ready(function(){
    $(".detail").click(function(){
        
        var code = $(this).attr("data-id");
         $.ajax({
          type: "GET",
          url: "detail.php?id="+code,
          data:{

          },
          success: function(response)
          { 
            $('#detail').html(response);
            $("#myModal").modal("show");
          },
          error: function (xhr, ajaxOptions, thrownError) {

          }
        });
       });
  })
</script>
</body>
</html>