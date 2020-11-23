<main id="content" role="main">
		<div class="section">
			<div class="container">
				<div class="row">

					<div class="three-quarters-block">
						<div class="content">

							<article class="post hentry" itemscope itemprop="blogPost">

								<header class="entry-header">

									<h2 class="entry-title" itemprop="headline"><?= $article['article_name'];?></h2>

									<div class="entry-meta">

										<span class="post-date">
											<i class="fa fa-clock-o fa-fw"></i>
                                            <span class="created">
                                                <?= $article['creation_date'];?>
                                            </span>
										</span> <!-- .post-date -->

										<span class="post-author">
											<i class="fa fa-user fa-fw"></i> Написана автором <span class="vcard">
                                                <?= $article['username'];?>
										</span> <!-- .post-author -->
									</div> <!-- .entry-meta -->

								</header> <!-- .entry-header -->
								<div class="entry-content" itemprop="articleBody">
                                    <?= $article['article_text']; ?>
								</div> <!-- .entry-content -->

							</article> <!-- .post -->

						</div> <!-- .content -->
					</div> <!-- .three-quarters-block -->
				</div> <!-- .row -->
			</div> <!-- .container -->
		</div> <!-- .section -->

	</main> <!-- #content -->
