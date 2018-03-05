<?php 
    require_once 'php/classes/Contact.php';
    $listid = "";
    if(isset($_GET['listid'])){
        $listid = $_GET['listid'];
    }
    $Contact = new Contact($_SESSION['id'], $id);
    if($_POST['edit_contact_list_submit']){
        $Contact->modifyContactListById($id,$_POST['contact_nr']);
    }
    $contact = $Contact->getContactById($id);
?>
<div class="row">
    <form class="form-horizontal" method="post" action="">
        <div class="col-sm-8">
            <div class="form-group">
                <label class="control-label col-sm-2" for="contact_nr">Număr:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="contact_nr" name="contact_nr" value="<?=$contact['contact_nr']?>" required />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="edit_contact_list_submit" class="btn btn-default" value="Salvează Număr" />
                </div>
            </div>
        </div>
    </form>
</div>
