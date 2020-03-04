<?php
$pixwell_maxwidth        = absint( $this->get( 'content_max_width' ) );
$pixwell_amp_logo        = pixwell_get_option( 'amp_logo' );
$pixwell_amp_footer_logo = pixwell_get_option( 'amp_footer_logo' );
$pixwell_footer_color    = pixwell_get_option( 'amp_footer_color' );
$pixwell_footer_bg       = pixwell_get_option( 'amp_footer_bg' );

if ( empty( $pixwell_footer_bg ) ) {
	$pixwell_footer_bg = '#333';
}

if ( empty( $pixwell_footer_color ) ) {
	$pixwell_footer_color = '#fff';
} ?>

html {
background: #fff;
}

.amp-wp-enforced-sizes {
max-width: 100%;
margin: 0 auto;
}

.amp-wp-unknown-size img {
object-fit: contain;
}

.amp-wp-header div,
.wp-caption-text,
.amp-wp-tax-category,
.amp-wp-tax-tag,
.amp-wp-comments-link,
.amp-wp-footer p,
.amp-wp-footer ul,
.back-to-top {
font-family: 'Quicksand', sans-serif;
}

h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6, h1.amp-wp-title {
font-weight: 700;
font-family: "Quicksand", sans-serif;
-ms-word-wrap: break-word;
word-wrap: break-word;
}

.amp-wp-title {
margin-bottom: 20px;
}

.amp-wp-meta {
font-weight: 500;
font-size: 11px;
font-family: 'Quicksand', sans-serif;
}

.amp-wp-article-header {
display: block;
overflow: hidden;
margin-bottom: 20px;
}

.amp-wp-article-header .amp-wp-meta:first-of-type {
font-weight: 700;
float: left;
}

.amp-wp-meta.amp-wp-posted-on {
float: right;
}

body, .amp-wp-article-content {
color: #333;
font-size: 16px;
font-family: 'Poppins', sans-serif;
line-height: 1.7;
}

.amp-wp-article-content:before,
.amp-wp-article-content:after {
clear: both;
display: table;
content: '';
}

.amp-wp-article-footer {
display: block;
clear: both;
overflow: hidden;
position: relative;
}

.amp-wp-header a {
color: #333;
text-decoration: none;
}

h1, .h1 {
font-size: 2.75rem;
line-height: 1.15;
}

h2, .h2 {
font-size: 1.625rem;
line-height: 1.25;
}

h3, .h3 {
font-size: 1.25rem;
line-height: 1.25;
}

h4, .h4 {
font-size: 1rem;
line-height: 1.45;
}

.h5, h5 {
font-size: .925rem;
line-height: 1.5;
}

h6, .h6 {
font-size: .875rem;
line-height: 1.5;
}

.amp-wp-article {
max-width: 860px;
padding-left: 15px;
padding-right: 15px;
margin-left: auto;
margin-right: auto;
overflow-wrap: break-word;
word-wrap: break-word;
}

.amp-wp-article-content {
position: relative;
display: block;
margin-top: 30px;
clear: both;
margin-bottom: 30px;
}

.entry.amp-wp-article-content-width {
margin-right: auto;
margin-left: auto;
}

.amp-wp-article-content dt {
margin-bottom: 10px;
}

.amp-wp-article-featured-image {
display: block;
margin: 0;
position: relative;
}

.amp-wp-article-content p,
.amp-wp-article-content ul,
.amp-wp-article-content dd {
margin-bottom: 1.5rem;
}

.amp-wp-article-content li > ul,
.amp-wp-article-content li > ol {
margin-top: 10px;
margin-bottom: 0;
}

.amp-wp-article-content dt {
font-weight: 700;
}

.amp-wp-article-content p a:not(button), .comment-content a {
color: #ff8763;
-webkit-transition: all .3s cubic-bezier(0.32, 0.74, 0.57, 1);
-moz-transition: all .3s cubic-bezier(0.32, 0.74, 0.57, 1);
-ms-transition: all .3s cubic-bezier(0.32, 0.74, 0.57, 1);
-o-transition: all .3s cubic-bezier(0.32, 0.74, 0.57, 1);
transition: all .3s cubic-bezier(0.32, 0.74, 0.57, 1);
text-decoration-line: underline;
text-decoration-color: transparent;
-webkit-text-decoration-color: transparent;
}

.amp-wp-article-content p a:not(button):hover,
.amp-wp-article-content p a:not(button):focus,
.comment-content a:hover, .comment-content a:focus {
text-decoration: underline;
text-decoration-color: currentColor;
-webkit-text-decoration-color: currentColor;
}

.amp-wp-article-content img,
.amp-wp-article-content video {
max-width: 100%;
height: auto;
}

.amp-wp-article-content address {
margin-bottom: 30px;
}

.aligncenter {
display: block;
clear: both;
margin-right: auto;
margin-left: auto;
}

.alignleft {
display: inline;
float: left;
margin-right: 30px;
margin-left: 0;
max-width: 600px;
}

.alignright {
display: inline;
float: right;
margin-left: 30px;
max-width: 600px;
}

.alignnone {
margin-left: auto;
margin-right: auto;
max-width: 100%;
}

.wp-caption img[class*="wp-image-"] {
display: block;
margin-right: auto;
margin-left: auto;
}

.amp-wp-article-content figure a {
border-bottom: none;
}

.amp-wp-article-content .fluid-width-video-wrapper {
margin-top: 30px;
margin-bottom: 30px;
}

.amp-wp-article-content iframe {
overflow: hidden;
margin-right: auto;
margin-bottom: 30px;
margin-left: auto;
max-width: 100%;
}

.amp-wp-article-content h1, .amp-wp-article-content h2 {
margin-top: 1em;
margin-bottom: .5em;
}

.amp-wp-article-content h3, .amp-wp-article-content h4, .amp-wp-article-content h5 {
margin-top: 1em;
margin-bottom: .5em;
}

.amp-wp-article-content h6 {
margin-top: 1em;
margin-bottom: .75em;
}

.amp-wp-article-content ol {
clear: both;
margin-bottom: 1.25rem;
margin-left: 1.25rem;
list-style-position: inside;
list-style-type: decimal;
}

.amp-wp-article-content ul {
clear: both;
margin-bottom: 1.25rem;
margin-left: 1.25rem;
list-style: circle;
}

.amp-wp-article-content li {
position: relative;
margin-bottom: 10px;
}

.wp-caption-text, .image-caption {
color: #555;
font-size: .825rem;
font-family: 'Montserrat', sans-serif;
line-height: 1.5;
}

.wp-caption-text {
margin-top: 10px;
text-align: right;
}

.wp-caption .wp-caption-text {
margin-bottom: 20px;
}

.gallery {
position: relative;
display: block;
overflow: hidden;
margin: -5px;
}

.gallery-item {
position: relative;
display: block;
float: left;
margin: 0;
padding: 5px;
}

.gallery-item img {
display: block;
width: 100%;
height: auto;
}

.gallery-item div {
margin: 0;
}

.gallery-item .wp-caption-text, .gallery-caption {
position: absolute;
top: auto;
right: 1px;
bottom: 0;
left: 1px;
padding: 5px 10px;
background-color: rgba(0, 0, 0, .7);
color: #fff;
line-height: 1.5;
}

.amp-wp-article-content .twitter-tweet {
margin-right: auto;
margin-bottom: 30px;
margin-left: auto;
}

.amp-wp-article-content iframe.instagram-media {
margin-right: auto;
margin-bottom: 1.5em;
margin-left: auto;
}

.gallery-columns-1 .gallery-item {
width: 100%;
}

.gallery-columns-2 .gallery-item {
width: 50%;
}

.gallery-columns-2 .gallery-item:nth-child(2n +1) {
clear: both;
}

.gallery-columns-3 .gallery-item {
width: 33.33%;
}

.gallery-columns-3 .gallery-item:nth-child(3n +1) {
clear: both;
}

.gallery-columns-4 .gallery-item {
width: 25%;
}

.gallery-columns-4 .gallery-item:nth-child(4n +1) {
clear: both;
}

.gallery-columns-5 .gallery-item {
width: 20%;
}

.gallery-columns-5 .gallery-item:nth-child(5n +1) {
clear: both;
}

.gallery-columns-6 .gallery-item {
width: 16.66%;
}

.gallery-columns-6 .gallery-item:nth-child(6n +1) {
clear: both;
}

.gallery-columns-7 .gallery-item {
width: 14.285%;
}

.gallery-columns-7 .gallery-item:nth-child(7n +1) {
clear: both;
}

.gallery-columns-8 .gallery-item {
width: 12.5%;
}

.gallery-columns-8 .gallery-item:nth-child(8n +1) {
clear: both;
}

.gallery-columns-9 .gallery-item {
width: 11.111%;
}

.gallery-columns-9 .gallery-item:nth-child(9n +1) {
clear: both;
}

/* Gutenberg */
ul.wp-block-gallery {
margin-bottom: 1.5rem;
margin-left: 0;
}

.wp-block-separator {
position: relative;
display: block;
margin-top: 1.5rem;
margin-bottom: 1.5rem;
padding-top: 2px;
border: none;
background-image: linear-gradient(to right, rgba(0, 0, 0, .1) 66.666%, rgba(255, 255, 255, 0) 0%);
background-position: top;
background-size: 20px 1px;
background-repeat: repeat-x;
}

.entry-content a.wp-block-button__link,
a.wp-block-button__link {
color: #fff;
font-size: 1rem;
margin-bottom: 20px;
-webkit-transition: all .3s cubic-bezier(0.32, 0.74, 0.57, 1);
-moz-transition: all .3s cubic-bezier(0.32, 0.74, 0.57, 1);
-ms-transition: all .3s cubic-bezier(0.32, 0.74, 0.57, 1);
-o-transition: all .3s cubic-bezier(0.32, 0.74, 0.57, 1);
transition: all .3s cubic-bezier(0.32, 0.74, 0.57, 1);
}

body .entry-content a.wp-block-button__link,
body a.wp-block-button__link {
text-decoration: none;
}

.entry-content a.wp-block-button__link:hover {
background-color: #ff8763;
}

.wp-block-quote, blockquote {
position: relative;
margin-top: 40px;
margin-bottom: 30px;
text-align: center;
}

.wp-block-quote:before, blockquote:before {
display: inline;
font-weight: normal;
font-size: 5rem;
content: '\201d';
line-height: 0;
vertical-align: bottom;
margin-bottom: 20px;
}

.wp-block-quote p,
blockquote p {
letter-spacing: -.02em;
font-weight: 700;
font-family: "Quicksand", sans-serif;
}

.wp-block-quote p {
margin-bottom: 1rem;
font-size: 1rem;
}

.wp-block-cover__inner-container p {
color: #fff;
}

.wp-block-pullquote {
margin-top: 0;
margin-bottom: 1.5rem;
padding: 20px;
}

.wp-block-table.is-style-stripes {
border-right: 1px solid rgba(0, 0, 0, .05);
border-bottom: 1px solid rgba(0, 0, 0, .05);
border-left: 1px solid rgba(0, 0, 0, .05);
}

.wp-block-archives-dropdown {
margin-bottom: 30px;
}

.wp-block-archives-dropdown select {
min-width: 300px;
}

.amp-wp-tax-category a,
.amp-wp-tax-tag a {
color: #333;
}

.wp-block-quote p, blockquote p {
margin-top: 0;
}

.btn-toggle {
position: absolute;
top: auto;
bottom: auto;
left: 0;
display: block;
overflow: hidden;
width: 40px;
height: 50px;
cursor: pointer;
}

.btn-toggle .off-canvas-toggle {
position: absolute;
top: 0;
left: 0;
z-index: 20;
display: block;
width: 100%;
height: 100%;
-webkit-transition: opacity .3s cubic-bezier(0.32, 0.74, 0.57, 1);
-moz-transition: opacity .3s cubic-bezier(0.32, 0.74, 0.57, 1);
-ms-transition: opacity .3s cubic-bezier(0.32, 0.74, 0.57, 1);
-o-transition: opacity .3s cubic-bezier(0.32, 0.74, 0.57, 1);
transition: opacity .3s cubic-bezier(0.32, 0.74, 0.57, 1);
}

.icon-toggle {
position: absolute;
top: 50%;
left: 0;
display: block;
width: 100%;
height: 1px;
background-color: currentColor;
font-size: 0;
-webkit-transition: background-color .3s cubic-bezier(0.32, 0.74, 0.57, 1);
-moz-transition: background-color .3s cubic-bezier(0.32, 0.74, 0.57, 1);
-ms-transition: background-color .3s cubic-bezier(0.32, 0.74, 0.57, 1);
-o-transition: background-color .3s cubic-bezier(0.32, 0.74, 0.57, 1);
transition: background-color .3s cubic-bezier(0.32, 0.74, 0.57, 1);
-webkit-touch-callout: none;
-webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
}

.icon-toggle:before, .icon-toggle:after {
position: absolute;
left: 0;
width: 75%;
height: 100%;
background-color: currentColor;
content: '';
-webkit-transition: -webkit-transform 0.35s, width .2s cubic-bezier(0.32, 0.74, 0.57, 1);
-moz-transition: -moz-transform 0.35s, width .2s cubic-bezier(0.32, 0.74, 0.57, 1);
-ms-transition: -ms-transform 0.35s, width .2s cubic-bezier(0.32, 0.74, 0.57, 1);
transition: transform 0.35s, width .2s cubic-bezier(0.32, 0.74, 0.57, 1);
}

.icon-toggle:before {
-webkit-transform: translateY(-700%);
transform: translateY(-700%);
}

.icon-toggle:after {
-webkit-transform: translateY(800%);
transform: translateY(800%);
}

#sidebar-left {
background-color: #333;
color: #fff;
padding: 40px 20px;
}

#sidebar-left ul {
list-style: none;
padding: 0;
}

#sidebar-left a {
color: #fff;
text-decoration: none;
display: block;
border-bottom: 1px solid rgba(255, 255, 255, 0.07);
min-width: 240px;
line-height: 40px;
font-size: 0.875rem;
text-transform: uppercase;
}

.amp-wp-footer {
background-color: #333;
color: #fff;
margin: 40px 0 0 0;
}

.amp-wp-article-footer .amp-wp-meta {
display: block;
}

.amp-wp-tax-category,
.amp-wp-tax-tag {
font-size: .875em;
line-height: 1.5em;
margin: 1.5em 16px;
}

.amp-wp-comments-link {
font-size: .875em;
line-height: 1.5em;
text-align: center;
margin: 2.25em 0 1.5em;
}

.amp-wp-comments-link a {
color: #fff;
cursor: pointer;
display: block;
font-size: 14px;
font-weight: 600;
line-height: 18px;
border-radius: 40px;
-webkit-border-radius: 40px;
margin: 0 auto;
max-width: 200px;
padding: 11px 16px;
text-decoration: none;
width: 50%;
-webkit-transition: background-color 0.2s ease;
transition: background-color 0.2s ease;
}

.amp-wp-comments-link a:hover {
background-color: #333;
}

#menu-footer a {
color: #fff;
text-decoration: none;
opacity: 1;
font-size: 0.875rem;
text-transform: uppercase;
}

.rb-related {
position: relative;
display: block;
overflow: hidden;
margin: 2rem 0;
padding: 15px 20px 5px 20px;
border: 1px solid rgba(0, 0, 0, 0.07);
}

.rb-related.is-dark-style {
display: block;
border: none;
background-color: #333;
color: #fff;
}

.rb-row {
display: flex;
display: -webkit-flex;
-webkit-flex-flow: row wrap;
flex-flow: row wrap;
justify-content: flex-start;
}

.rb-related-el {
display: flex;
display: -webkit-flex;
flex-flow: row nowrap;
flex-grow: 1;
align-items: center;
}

@media (min-width: 768px) {
.rb-col-t6 {
max-width: 50%;
flex: 0 0 50%;
}
}

a {
background-color: transparent;
color: inherit;
text-decoration: none;
}

.rb-related-el a:hover, .rb-related-el a:focus {
text-decoration: underline;
text-decoration-color: currentColor;
-webkit-text-decoration-color: currentColor;
}

.rb-related-content > * {
margin-bottom: 20px;
display: flex;
display: -webkit-flex;
min-width: 0;
flex-flow: row wrap;
}

.rb-related-el .p-thumb img {
display: flex;
display: -webkit-flex;
width: 90px;
flex-shrink: 0;
}

.rb-related-el .entry-title {
display: flex;
display: -webkit-flex;
margin: 0;
padding-left: 15px;
flex: 1;
}

.rb-related .rb-related-header {
position: relative;
display: block;
margin-top: 0;
margin-bottom: 20px;
padding-left: 20px;
}

.rb-related .rb-related-header:before {
position: absolute;
top: -5%;
right: auto;
bottom: -5%;
left: 0;
z-index: 1;
display: block;
width: 40px;
height: 110%;
background-color: transparent;
background-image: radial-gradient(currentColor 1px, transparent 1px);
background-position: 1px 1px;
background-size: 5px 5px;
content: '';
opacity: .25;
}

.rb-related-el figure.p-thumb {
margin: 0;
}

.amp-wp-content,
.amp-wp-title-bar div {
<?php if ( $pixwell_maxwidth > 0 ) : ?>
	margin: 0 auto;
	max-width: <?php echo sprintf( '%dpx', $pixwell_maxwidth ); ?>;
<?php endif; ?>
}

.amp-wp-header {
text-algin: center;
-webkit-box-shadow: 0 10px 16px 0 rgba(28, 28, 28, 0.04);
-moz-box-shadow: 0 10px 16px 0 rgba(28, 28, 28, 0.04);
box-shadow: 0 10px 16px 0 rgba(28, 28, 28, 0.04);
}

.amp-wp-header div {
text-align: center;
font-size: 1em;
font-weight: 400;
margin: 0 auto;
max-width: calc(840px - 32px);
padding: .875em 16px;
position: relative;
}


.amp-wp-article-content amp-carousel amp-img,
.amp-wp-article-content figure amp-img{
margin: 0 auto;
}

<?php if ( $pixwell_amp_logo['url'] ): ?>
	.amp-wp-header a {
	display: block;
	background-size: contain;
	background-position: center center;
	background-image: url( '<?php echo esc_url( $pixwell_amp_logo['url'] ); ?>' );
	background-repeat: no-repeat;
	height: 40px;
	width: 300px;
	margin: 0 auto;
	text-indent: -9999px;
	}
<?php else: ?>
	.amp-wp-header a {
	display: inline-block;
	text-decoration: none;
	text-transform: uppercase;
	margin: auto;
	letter-spacing: -0.025em;
	font-weight: 900;
	font-size: 38px;
	line-height: 1;
	font-family: 'Quicksand', sans-serif;
	}
<?php endif; ?>


/* Site Icon */
.amp-wp-header .amp-wp-site-icon {
border-radius: 50%;
position: absolute;
right: 18px;
top: 10px;
}

.amp-wp-article-header .amp-wp-meta:last-of-type {
text-align: right;
}

.amp-wp-byline amp-img,
.amp-wp-byline .amp-wp-author {
display: inline-block;
vertical-align: middle;
}

.amp-wp-byline amp-img {
border-radius: 50%;
position: relative;
margin-right: 6px;
}

.amp-wp-posted-on {
text-align: right;
}

/* Featured image */

.amp-wp-article-featured-image amp-img {
margin: 0 auto;
}

.amp-wp-article-featured-image.wp-caption .wp-caption-text {
margin: 0 18px;
}

amp-carousel {
background: rgba(0,0,0,.07);
margin: 0 -16px 1.5em;
}
amp-iframe,
amp-youtube,
amp-instagram,
amp-vine {
background: rgba(0,0,0,.07);
margin: 0 -16px 1.5em;
}

.amp-wp-article-content amp-carousel amp-img {
border: none;
}

amp-carousel > amp-img > img {
object-fit: contain;
}

.amp-wp-iframe-placeholder {
background: #f2f2f2 url( <?php echo esc_url( $this->get( 'placeholder_image_url' ) ); ?> ) no-repeat center 40%;
background-size: 48px 48px;
min-height: 48px;
}

.amp-wp-footer {
background-color: <?php echo sanitize_hex_color( $pixwell_footer_bg ); ?>;
color: <?php echo sanitize_hex_color( $pixwell_footer_color ); ?>;
}

.amp-wp-footer div {
margin: 0 auto;
max-width: calc(840px - 32px);
padding: 40px 20px;
position: relative;
}

.amp-wp-footer h2 {
display: block;
text-align: center;
line-height: 1.375em;
margin: 0 0 .5em;
}

<?php if ( $pixwell_amp_footer_logo['url'] ): ?>
	.amp-wp-footer h2 {
	display: block;
	background-size: contain;
	background-position: center center;
	background-image: url( '<?php echo esc_url( $pixwell_amp_footer_logo['url'] ); ?>' );
	background-repeat: no-repeat;
	height: 60px;
	width: 400px;
	margin: 0 auto;
	margin-bottom: 20px;
	text-indent: -9999px;
	}
<?php endif; ?>



.amp-wp-footer p {
font-size: .875rem;
line-height: 1.5em;
margin: 0 85px 0 0;
}

.amp-wp-footer a {
color: <?php echo sanitize_hex_color( $pixwell_footer_color ); ?>;
text-decoration: none;
opacity: .7;
transition: all .25s ease;
-webkit-transition: all .25s ease;
}

.amp-wp-footer a:hover {
opacity: 1;
}

.back-to-top {
position: fixed;
display: block;
top: auto;
font-size: 20px;
right: 25px;
bottom: 25px;
color: #fff;
height: 40px;
line-height: 36px;
text-align: center;
width: 40px;
vertical-align: middle;
background-color: #333;
transition: all .25s ease;
-webkit-transition: all .25s ease;
}

body .back-to-top {
top: auto;
color: #fff;
}

.back-to-top:hover {
 opacity: 1;
}

.amp-wp-footer p {
text-align: center;
margin: 20px auto 0 auto;
max-width: calc(840px - 32px);
}

.amp-wp-footer li {
display: inline-block;
list-style: none;
font-size: 12px;
padding: 0 10px;
font-weight: 400;
text-transform: uppercase;
}

.amp-wp-footer .menu {
padding: 0;
text-align: center;
}