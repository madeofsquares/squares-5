<?php $adminemail = get_option ( 'admin_email' ); ?>

<footer role="contentinfo">
    <div class="legal"><p>&copy; <?php echo date( "Y" ); ?> Steve Lambert</p></div>
    <div class="contact"><p>Contact: <a href="mailto:<?php echo $adminemail; ?>"><?php echo $adminemail; ?></a></p></div>
</footer>

</div> <!-- /wrapper -->

<?php wp_footer(); ?>

</body>
</html>