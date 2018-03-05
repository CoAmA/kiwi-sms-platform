<?php 
    require_once 'php/classes/ContactList.php';
    $ContactList = new ContactList($_SESSION['id']);
    $contact_lists = $ContactList->getContactLists();
    
    if($_POST['send_message']){
        sendMessagesToManuNumbers($_SESSION['id'],$_POST['contact_list_id'],$_POST['message'],$_POST['device']);
    }
?>
<form class="form-horizontal" method="post" action="">
    <div class="col-sm-8">
        <div class="form-group">
            <label class="control-label col-sm-2" for="project_title">Numele listei:</label>
            <div class="col-sm-10">
                <select name="contact_list_id" id="contact_list_id" class="form-control" required>
                    <option value=""> Alege lista </option>
                    <?php foreach($contact_lists as $list){ ?>
                        <option value="<?=$list['contact_list_id']?>"><?=$list['contact_list_name']?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="device">ID Dispozitiv:</label>
            <div class="col-sm-10">
                <input type="text" name="device" id="device" class="form-control" required />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="message">Mesaj:</label>
            <div class="col-sm-10">
                <textarea name="message" id="message" class="form-control" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="send_message" class="btn btn-default" value="Trimite mesaj" />
            </div>
        </div>
    </div>
</form>