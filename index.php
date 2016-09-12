<?php include 'header.php'; ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <ul class="nav nav-tabs nav-justified">
          <li class="active"><a href="#with_retweeted" data-toggle="tab">Reweeted with #custserv</a></li>
          <li><a href="#without_retweeted" data-toggle="tab">No Retweeted with #custserv</a></li>
        </ul>

        <!-- tweet tab view -->
        <div class="tab-content" style="margin-bottom:10px;">
          <div class="tab-pane active" id="with_retweeted">

            <?php
            $tweetClass = new TwitterClass();

            $tweets = $tweetClass->getSearchAPIResults('#custserv');
            $tweets = $tweets->statuses;
            $totalTweets = count($tweets);

            for($i = 0; $i<$totalTweets; $i++)
            { 
              if($tweets[$i]->retweet_count != 0)
              {
                ?>

                <a href="https://twitter.com/<?php echo $tweets[$i]->user->screen_name; ?>/status/<?php echo $tweets[$i]->id; ?>">
                  <div class="col-lg-12 tweet_view">
                    <div class="row content-view">
                      <div class="col-md-1">
                        <img src="<?php echo $tweets[$i]->user->profile_image_url; ?>" class="img-rounded"> 
                      </div>
                      <div class="col-md-11">

                        <span class="tweet_by">
                          <a href="https://twitter.com/<?php echo $tweets[$i]->user->screen_name; ?>/"><?php echo $tweets[$i]->user->name; ?>
                          </a> 
                          <span style="opacity:0.5; font-size:15px;">@<?php echo $tweets[$i]->user->screen_name; ?>
                          </span>
                        </span>
                        
                        <p><?php echo $tweets[$i]->text; ?></p>

                        <?php if(!empty($tweets[$i]->entities->media)){ ?>

                        <img src="<?php echo $tweets[$i]->entities->media[0]->media_url; ?>" width="<?php echo $tweets[$i]->entities->media[0]->sizes->small->w; ?>" height="<?php echo $tweets[$i]->entities->media[0]->sizes->small->h; ?>" class="img-responsive"><br><br>
                        <?php
                      }
                      ?>


                        <i class="fa fa-reply tweet-additional-icon"></i>
                        <i class="fa fa fa-retweet tweet-additional-icon placing"> <?php echo $tweets[$i]->retweet_count; ?></i>
                        <i class="fa fa fa-heart tweet-additional-icon placing"> <?php echo $tweets[$i]->favorite_count; ?></i> &nbsp;&nbsp; <span style="opacity:0.5;"><?php echo date( 'D H:i A d M Y', strtotime($tweets[$i]->created_at)+19800); ?></span>
                      </div>
                    </div>
                  </div>
                </a>

              <?php
            } 
          }
          ?>
        </div>

        <div class="tab-pane" id="without_retweeted">
          <?php
          $tweetClass = new TwitterClass();

          $tweets = $tweetClass->getSearchAPIResults('#custserv');
          $tweets = $tweets->statuses;
          $totalTweets = count($tweets);

          for($i = 0; $i<$totalTweets; $i++)
          { 
            if($tweets[$i]->retweet_count == 0)
            {
              ?>


              <a href="https://twitter.com/<?php echo $tweets[$i]->user->screen_name; ?>/status/<?php echo $tweets[$i]->id; ?>">
                <div class="col-lg-12 tweet_view">
                  <div class="row content-view">
                    <div class="col-md-1">
                      <img src="<?php echo $tweets[$i]->user->profile_image_url; ?>" class="img-rounded"> 
                    </div>
                    <div class="col-md-11">
                      <span class="tweet_by"><a href="https://twitter.com/<?php echo $tweets[$i]->user->screen_name; ?>/"><?php echo $tweets[$i]->user->name; ?></a> <span style="opacity:0.5; font-size:15px;">@<?php echo $tweets[$i]->user->screen_name; ?></span></span>
                      <p><?php echo $tweets[$i]->text; ?></p>

                      <?php 
                      if(!empty($tweets[$i]->entities->media))
                      {
                        ?>
                        <img src="<?php echo $tweets[$i]->entities->media[0]->media_url; ?>" width="<?php echo $tweets[$i]->entities->media[0]->sizes->small->w; ?>" height="<?php echo $tweets[$i]->entities->media[0]->sizes->small->h; ?>" class="img-responsive"><br><br>
                        <?php
                      }
                      ?>


                      <i class="fa fa-reply tweet-additional-icon"></i>
                      <i class="fa fa fa-retweet tweet-additional-icon placing"> <?php echo $tweets[$i]->retweet_count; ?></i>
                      <i class="fa fa fa-heart tweet-additional-icon placing"> <?php echo $tweets[$i]->favorite_count; ?></i> &nbsp;&nbsp; <span style="opacity:0.5;"><?php echo date( 'D H:i A d M Y', strtotime($tweets[$i]->created_at) + 19800); ?></span>
                    </div>
                  </div>
                </div>
              </a>

              <?php
            } 
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>