<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
include_once ($filepath.'/../classes/Contact.php');
$con_us = new Contact();
$fm = new Format();

 $page = isset($_GET['pp'])? $_GET['pp'] : '';

 if ($page == 'delsend') {
 	$myid = $_POST['id'];
 	$id = str_replace(' ', ',', $myid);
 	$reustrow = $con_us->deleteUserSendMessage($id);
 	
 }else{
                     
     $getConMessList = $con_us->getContactUserSendMessageList();
     
     if ($getConMessList) {
       while ($result = $getConMessList->fetch_assoc()) {
       
        ?>
          <tr style="<?php if ($result['status'] == '1') { ?>
           color:#ccc;
         <?php } ?>">
            <td><input type="checkbox" class="checkitem" value="<?php echo $result['send_id'] ?>"></td>
            <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
            <td class="mailbox-name"><a href="read-mail.php?viewContactmsg=<?php echo $result['send_id']; ?>"><b><?php echo $result['to_mail']; ?></b></a></td>
            <td class="mailbox-subject"><a href="read-mail.php?viewContactmsg=<?php echo $result['send_id']; ?>">
              <?php echo $result['mail_subject']; ?></a>
            </td>
            <td class="mailbox-attachment"></td>
            <td class="mailbox-date"><?php echo $fm->FormatDate($result['mail_date']); ?></td>
          </tr>
        <?php } } else{
               echo "<span style='color:green;font-size:18px;'>This Message are not Available !</span>";
                } } ?>