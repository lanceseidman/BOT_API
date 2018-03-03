<br><br>
<!-- Start Pagination -->
    <ul class="pagination">
        <li><a href="?page=1"><<< First</a></li>
        <li class="<?php if($page <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>"> << Prev</a>
        </li>
        <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=".($page + 1); } ?>">Next >></a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last >>></a></li>
    </ul>

</div>
</body>
</html>
<?php 
    mysqli_close($conn); // Close DB...
?>