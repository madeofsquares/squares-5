<?php $adminemail = get_option ( 'admin_email' ); ?>

</div> <!-- /wrapper from header.php -->

<footer role="contentinfo">
    <div class="legal"><p>&copy; <?php echo date( "Y" ); ?> Steve Lambert</p></div>
    <div class="contact"><p>Contact: <a href="mailto:<?php echo $adminemail; ?>"><?php echo $adminemail; ?></a></p></div>
</footer>

<?php wp_footer(); ?>

</body>
</html>