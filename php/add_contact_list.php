<?php 
    require_once 'php/classes/ContactList.php';
    $ContactList = new ContactList($_SESSION['id']);
    
    if($_POST['add_contact_list_submit']){
        $ContactList->addContactList($_POST['contact_list_name']);
    }
?>
<form class="form-horizontal" method="post" action="">
    <div class="col-sm-8">
        <div class="form-group">
            <label class="control-label col-sm-2" for="contact_list_name">Numele listei:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="contact_list_name" name="contact_list_name" required />
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="add_contact_list_submit" class="btn btn-default" value="Adaugă Listă" />
            </div>
        </div>
    </div>
</form>