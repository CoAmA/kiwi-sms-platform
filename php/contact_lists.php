<?php 
    require_once 'php/classes/ContactList.php';
    $ContactList = new ContactList($_SESSION['id']);
    if(isset($_POST['delete_contact_list'])){
        $ContactList->deleteContactListById($_POST['contact_list_id']);
    }
    $contact_lists = $ContactList->getContactLists(); 
    $i=1;
?>
<table class="table table-bordered table-striped table-hover table-heading table-datatable">
    <thead>
        <tr>
            <th>Nr. Crt.</th>
            <th>Listă</th>
            <th>Data</th>
            <th>Acțiuni</th>
        </tr>
    </thead>
    <tbody>
        <?php if($contact_lists) { ?>
            <?php foreach($contact_lists as $contact_list) { ?>
                <tr>
                    <td>
                        <?=$i?>
                    </td>
                    <td>
                        <a href='<?=ROOT_NAME?>/index.php?page=edit_contact_list&id=<?=$contact_list['contact_list_id']?>'>
                            <?=$contact_list['contact_list_name']?>
                        </a>
                    </td>
                    <td>
                        <?=$contact_list['contact_list_date']?>
                    </td>
                    <td>
                        <a href='<?=ROOT_NAME?>index.php?page=contacts&id=<?=$contact_list['contact_list_id']?>' class="btn btn-default">
                            Vezi Numere
                        </a>
                        <a href='<?=ROOT_NAME?>index.php?page=add_contact&id=<?=$contact_list['contact_list_id']?>' class="btn btn-default">
                            Adaugă Numere
                        </a>
                        <a href='<?=ROOT_NAME?>/index.php?page=edit_contact_list&id=<?=$contact_list['contact_list_id']?>' class="btn btn-default">
                            Edit
                        </a>
                        <form method="post" action="">
                            <input type="hidden" name="contact_list_id" id="project_id" value="<?=$contact_list['contact_list_id']?>" />
                            <button type="submit" name="delete_contact_list" class="btn btn-disabled">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            <?php $i++; 
                } ?>
        <?php }else{ ?>
            <tr>
                <td colspan="4" align="center">
                    Nu aveți adăugat nici o listă de contacte în baza de date, <a href="<?=ROOT_NAME?>index.php?page=add_contact_list"> adăugați o listă! </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>