<?php 
    require_once 'php/classes/Contact.php';
    require_once 'php/classes/ContactList.php';
	$id=0;
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}
    $Contact = new Contact($_SESSION['id'], $id);
    $ContactList = new ContactList($_SESSION['id']);
    if($_POST['add_contact_submit']){
        $Contact->addMultipleContacts($_POST['contact_nr']);
    }
    $contact_lists = $ContactList->getContactLists();
?>
<form class="form-horizontal" method="post" action="">
    <div class="col-sm-8">
        <div class="form-group">
            <label class="control-label col-sm-2" for="contact_nr">Numere:</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="contact_nr" name="contact_nr" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="add_contact_submit" class="btn btn-default" value="Adaugă Numere" />
            </div>
        </div>
    </div>
</form>