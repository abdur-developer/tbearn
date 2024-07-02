<div class="report-container">
    <div class="report-header">
        <h1 class="recent-Articles">Withdraw</h1>
        <!--  -->
    </div>

    <table class="report-body package">
        <thead class="">
            <tr>
                <th><h3 class="t-op">Number</h3></th>
                <th><h3 class="t-op">Amount</h3></th>
                <th><h3 class="t-op">Method</h3></th>
                <th><h3 class="t-op">Status</h3></th>
                <th><h3 class="t-op">Action</h3></th>
        </div>

        <tbody class="items">
            <?php 
            $user_query = mysqli_query($conn, "SELECT * FROM withdraw");
            if(mysqli_num_rows($user_query) > 0){
                while($row = mysqli_fetch_assoc($user_query)){ 
                    $with_id = $row['id'];?>
                <tr>
                    <td><h3 class="t-op-nextlvl"><?= $row['number'] ?></h3></td>
                    <td><h3 class="t-op-nextlvl"><?= $row['amount'] ?></h3></td>
                    <td><h3 class="t-op-nextlvl"><?= $row['method'] ?></h3></td>
                    <?php 
                        if($row['status'] == 0){
                            echo "<td><h3 class='t-op-nextlvl label-tag-yellow'>Pending</h3></td>";
                            echo "<td><h3 class='t-op-nextlvl'>
                                    <a href='?q=withdraw&w_action=app&id=$with_id' class='view-true'>Approve</a>
                                    <a href='?q=withdraw&w_action=rej&id=$with_id' class='view-false'>Reject</a>
                                </h3></td>";
                        }elseif($row['status'] == 2){
                            echo "<td><h3 class='t-op-nextlvl label-tag-red'>Banned</h3></td>";
                            echo "<td><h3 class='t-op-nextlvl'>
                                    <a href='?q=withdraw&w_action=del&id=$with_id' class='view-false'>Delete</a>
                                </h3></td>";
                        }else{
                            echo "<td><h3 class='t-op-nextlvl label-tag'>Active</h3></td>";
                            echo "<td><h3 class='t-op-nextlvl'>
                                    <a href='?q=withdraw&w_action=del&id=$with_id' class='view-false'>Delete</a>
                                </h3></td>";
                        }
                    ?>
                </tr>
             <?php }
            }else{ ?>
                <style>
                    .ptc-card {
                        border: 1px solid #6f125480;
                        padding: 10px 20px;
                        border-radius: 10px;
                        margin-top: 25px;
                        background: linear-gradient(to bottom, #6f125440, #fff) !important;
                    }
                    .ptc-card {
                        text-align: center;
                    }
                </style>
                <div class="ptc-card">
                    <h2>Data not found</h2>
                </div>
             <?php
            } ?>
            
        </tbody>
    </div>
</div>