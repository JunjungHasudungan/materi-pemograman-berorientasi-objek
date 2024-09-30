<?php if (isset($_SESSION['success_message'])): ?>
    <div id="message" class="message">
        <?= $_SESSION['success_message']; ?>
    </div>
    <?php unset($_SESSION['success_message']);  ?>
<?php endif; ?>
