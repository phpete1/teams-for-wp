<?php
/**
 * This file contains HTML code that builds a form for the team members meta box.
 *
 * @var $role
 */
?>
<table class='form-table' role='presentation'>
    <tbody>
        <tr class='form-field form-required'>
            <th scope='row'>
                <label for='phpete_team_member_role'><?php echo _x('Organization Role', 'label for role field team member meta box', 'textdomain'); ?></label>
            </th>
            <td>
                <input name='phpete_team_member[role]' type='text' id='phpete_team_member_role' value='<?php echo esc_html($role); ?>' placeholder='<?php echo _x('Role in the organization', 'placeholder for role field in meta box', 'textdomain'); ?> '>
            </td>
        </tr>
    </tbody>

</table>