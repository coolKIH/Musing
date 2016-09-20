/**
 * Created by hao on 9/13/16.
 */
$(function () {
    $('#myForm').areYouSure(
        {
            message:'It looks like you have been editing something. '
            + 'If you leave before saving, your changes will be lost.'
        }
    );
    $('.discussForm').areYouSure(
        {
            message:'It looks like you have been editing something. '
            + 'If you leave before saving, your changes will be lost.'
        }
    )
});