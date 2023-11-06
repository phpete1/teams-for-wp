<?php
/**
 * This file contains HTML code that builds a form for the team members meta box.
 *
 * @var $role
 * @var $length_service
 * @var $email
 * @var $phone
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
    <tr class='form-field form-required'>
        <th scope='row'>
            <label for='phpete_team_member_start_date'><?php echo esc_attr(_x('Start Date', 'label for start date field team member meta box', 'textdomain')); ?></label>
        </th>
        <td>
            <input name='phpete_team_member[start_date]' type='text' id='phpete_team_member_start_date' value='<?php echo esc_html($start_date); ?>' placeholder='<?php echo esc_attr(_x('yyyy/mm/dd - When did they join the organization', 'placeholder for length of service field in meta box', 'textdomain')); ?> '>
        </td>
    </tr>
    <tr class='form-field form-required'>
        <th scope='row'>
            <label for='phpete_team_member_email'><?php echo esc_attr(_x('Email', 'label for email field team member meta box', 'textdomain')); ?></label>
        </th>
        <td>
            <input name='phpete_team_member[email]' type='email' id='phpete_team_member_email' value='<?php echo esc_html($email); ?>' placeholder='<?php echo esc_attr(_x('example@wordpress.org', 'placeholder for email field in meta box', 'textdomain')); ?> '>
        </td>
    </tr>
    <tr class='form-field form-required'>
        <th scope='row'>
            <label for='phpete_team_member_phone'><?php echo esc_attr(_x('Phone', 'label for phone field team member meta box', 'textdomain')); ?></label>
        </th>
        <td>
            <input name='phpete_team_member[phone]' type='tel' id='phpete_team_member_phone' value='<?php echo esc_html($phone); ?>' placeholder='<?php echo esc_attr(_x('+44 7123 456 789', 'placeholder for phone field in meta box', 'textdomain')); ?> '>
        </td>
    </tr>
    </tbody>

</table>