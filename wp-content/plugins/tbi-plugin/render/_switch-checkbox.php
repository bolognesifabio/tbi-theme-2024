<div class="switch-checkbox">
    <input
        class="switch-checkbox__input"
        type="checkbox" 
        value="<?= $value ?: "" ?>"
        name="<?= $name ?: "" ?>"
        <?= $is_checked ? "checked" : "" ?>
    />
    <div class="switch-checkbox__interface"></div>
</div>