<form method="get">
    <input type="hidden" name="user_id" value="{{ $user_id }}">
    <input type="password" name="current_password" required value="" minlength="6" placeholder="Current password">
    <input type="password" name="new_password" required value="" minlength="6" placeholder="New password">
    <input type="password" name="new_re_password" required value="" minlength="6" placeholder="Repeat password">
    <input type="submit" value="Edit password">
</form>