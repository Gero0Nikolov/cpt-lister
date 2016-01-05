#Custom Post Type Lister - CPT Lister
<p>
	This is one amazing, Open Source plugin!<br>
	It allows you to list posts from your custom post types.<br>
	What is more <strong>amazing</strong> ?<br>
	It is <strong>Open Source</strong> and yes that means you can contribute to it at every moment you want!<br>
</p>
<p>
	I am the author and my name is <strong>Gero Nikolov</strong>.
	My official website is <a href='http://blogy.co' target='_blank'>Blogy</a>, which is <strong>social media</strong> for <strong>Bloggers</strong>.<br>
	But I am also a <strong>WordPress</strong> engineer at <a href='http://devrix.com' target='_blank'>DevriX</a>.<br>
	<br>
	Check my blog <a href='http://blogy.co?GeroNikolov' target='_blank'>here</a>.<br>
	<br>
	Cheers! :)
</p>

#How it works ?
<p>
	<strong>CPT Lister</strong> should be called via shortcode <strong>[cpt_show]</strong><br>
	<strong>CPT Lister</strong> receives the following arguments :<br>
</p>
<ol>
	<li start="1">type - This is where you say from which CPT you want to get your posts.</li>
	<li>post_status - This is used to tell the plugin for what posts it should look. Here you can use all of the available <stront>WordPress</strong> options.</li>
	<li>order - This tells the shortcode how to order the results. You can use all of the available <stront>WordPress</strong> options.</li>
	<li>order_by - This tells the shortcode by what your results should be ordered. You can use all of the available <stront>WordPress</strong> options.</li>
	<li>posts_per_page - This is used to tell the shortcode how many post should it collect. To get all of the posts that are available in the CPT just set its value to <strong>-1</strong></li>
	<li>titles_as_links - This tells the shortcode if the titles of the listed posts should be links that are pointing to the specific page for every unique post. Possible values are <strong>0 & 1<strong>. If the value is set to <strong>0</strong> it will print the title without wrapping it in HTML Link tag (<a href=""></a>), but if the value is set to <strong>1</strong> it will wrap the post title into HTML Link tag and it will point to the specific post page.</li>
	<li>show_post_content - This tells the shortcode if it should show the post content under their titles. Possible values are <strong>0 & 1</strong>. If the value is <strong>0</strong> it won't show the post content under its title, but if the value is set to <strong>1</strong> it will list the post content also.</li>
	<li>cptl_title_link_class - This is used to tell the shortcode what class should be added to the Link Wrapper of the post title. By default it is <strong>cptl_title_link</strong></li>
	<li>cptl_title_class - This tells the shortcode what class should be added to the Title Wrapper of the post title. By default it is <strong>cptl_title</strong></li>
	<li>cptl_content_class - This is used to tell the shortcode what calss should be added to the Content Wrapper of the post content. By default it is <strong>cptl_content</strong></li>
</ol>
