<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
include_once ($filepath.'/../classes/Contact.php');
$con_us = new Contact();
$fm = new Format();

 $page = isset($_GET['p'])? $_GET['p'] : '';

 if ($page == 'del') {
 	$myid = $_POST['id'];
 	$id = str_replace(' ', ',', $myid);
 	$reustrow = $con_us->deleteUserMessage($id);
 	
 }else{
                     
     $getConMessList = $con_us->getContactUserMessageList();
     
     if ($getConMessList) {
       while ($result = $getConMessList->fetch_assoc()) {
       
        ?>
          <tr style="<?php if ($result['status'] == '1') { ?>
           color:#ccc;
         <?php } ?>">
            <td><input type="checkbox" class="checkitem" value="<?php echo $result['user_id'] ?>"></td>
            <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
            <td class="mailbox-name"><a href="read-mail.php?viewContactmsg=<?php echo $result['user_id']; ?>"><?php echo $result['user_name']; ?></a></td>
            <td class="mailbox-subject"><b><?php echo $result['user_email']; ?></b> - <a href="read-mail.php?viewContactmsg=<?php echo $result['user_id']; ?>">
              <?php echo $fm->textMqShorten($result['user_subject']); ?></a>
            </td>
            <td class="mailbox-attachment"></td>
            <td class="mailbox-date"><?php echo $fm->FormatDate($result['date']); ?></td>
          </tr>
        <?php } } else{
               echo "<span style='color:green;font-size:18px;'>This Message are not Available !</span>";
                } } ?>