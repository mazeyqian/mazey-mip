            </div>
        </div>
        <footer class="post-footer">
            <div>
                <p class="text-center">Copyright © 2017 <?php bloginfo('name'); ?> - <a href="http://beian.miit.gov.cn/" target="_blank"><?php echo get_option('zh_cn_l10n_icp_num', '备案'); ?></a></p>
            </div>
        </footer>
        <!-- 回到顶部 -->
        <mip-fixed type="gototop">
            <mip-gototop></mip-gototop>
        </mip-fixed>
        <!-- 基础 -->
        <script src="<?php echo get_template_directory_uri(); ?>/js/mip.js"></script>
        <!-- 表单 -->
        <script src="<?php echo get_template_directory_uri(); ?>/js/mip-form.js"></script>
        <!-- 回到顶部 -->
        <script src="<?php echo get_template_directory_uri(); ?>/js/mip-gototop.js"></script>
        <!-- 百度统计 -->
        <mip-stats-baidu token="6093dc8852fa692727756c5638f84606"></mip-stats-baidu>
        <script src="<?php echo get_template_directory_uri(); ?>/js/mip-stats-baidu.js"></script>
    </body>
</html>
