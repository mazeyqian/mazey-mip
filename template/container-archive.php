                <div class="col-md-8">
                    <div class="post-category-header">
                        <!--搜索标题 -->
                        <h3><?php the_archive_title(); ?></h3>
                    </div>
                    <?php require_once(dirname(__FILE__) . '/part-post-content.php'); ?>
                    <?php require_once(dirname(__FILE__) . '/part-total-pagination.php'); ?>
                </div>