<?php 
    require_once 'php/classes/ContactList.php';
    $ContactList = new ContactList($_SESSION['user_id']);
    if($_POST['edit_contact_list_submit']){
        $ContactList->editContactListById($id);
    }
    $contact_list = $ContactList->getContactListById($id);
?>
<div class="row">
    <form class="form-horizontal" method="post" action="">
        <div class="col-sm-8">
            <div class="form-group">
                <label class="control-label col-sm-2" for="contact_list_name">Numele listei:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="contact_list_name" name="contact_list_name" value="<?=$contact_list['contact_list_name']?>" required />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="edit_contact_list_submit" class="btn btn-default" value="Salvează Listă" />
                </div>
            </div>
        </div>
    </form>
</div>
