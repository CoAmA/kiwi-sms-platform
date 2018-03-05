<?php 
    //require_once 'php/classes/ContactList.php';
    require_once 'php/classes/Contact.php';
    $Contact = new Contact($_SESSION['id'],$id);
    if(isset($_POST['delete_contact'])){
        $Contact->deleteContactById($_POST['contact_id']);
    }
    $contacts = $Contact->getContacts(); 
    $i=1;
?>
<table class="table table-bordered table-striped table-hover table-heading table-datatable">
    <thead>
        <tr>
            <th>Nr. Crt.</th>
            <th>Număr</th>
            <th>Data</th>
            <th>Acțiuni</th>
        </tr>
    </thead>
    <tbody>
        <?php if($contacts) { ?>
            <?php foreach($contacts as $contact) { ?>
                <tr>
                    <td>
                        <?=$i?>
                    </td>
                    <td>
                        <a href='<?=ROOT_NAME?>index.php?page=edit_contact&id=<?=$contact['contact_id']?>'>
                            <?=$contact['contact_nr']?>
                        </a>
                    </td>
                    <td>
                        <?=$contact['contact_date']?>
                    </td>
                    <td>
                        <a href='<?=ROOT_NAME?>index.php?page=edit_contact&listid=<?=$id?>&id=<?=$contact['contact_id']?>' class="btn btn-default">
                            Edit
                        </a>
                        <form method="post" action="">
                            <input type="hidden" name="contact_id" id="contact_id" value="<?=$contact['contact_id']?>" />
                            <button type="submit" name="delete_contact" class="btn btn-disabled">
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
                    Nu aveți adăugat nici un număr în această listă, <a href="<?=ROOT_NAME?>/index.php?page=add_contact"> adăugați un număr! </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>