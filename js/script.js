$(document).ready(function(){

    //Add contact
    function addContact()
    {
            //Post data from form
            $.post('test.php',$(this).serialise())
                .done(function(data){
                    console.log(data);
                });
            return false;
    }
});
