<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
echo '<?xml version="1.0" encoding="utf-8"?>' . "\n";?>
<rss version="2.0">
	<channel>
		<title><?php echo $feed_name; ?></title>
		<link></link>
		<language><?php echo $language; ?></language>
		<?php foreach($posts as $row):?>
		<image>
			<url>http://tabloidjubi.com/templates/anyar/images/logo-j.jpg</url>
            <title><?php echo $feed_name; ?></title>
            <link>http://tabloidjubi.com</link>
        </image>
			<item>
			    <id><?php echo $row->id+0; ?></id>
				<title><?php echo $row->judul; ?></title>
				<pubDate><?php echo $row->tanggal.' '.$row->jam; ?></pubDate>
				<author><?php echo $row->author; ?></author>
				<link><?php echo $row->id;?></link>
				<description>
				    <![CDATA[
				    <p><img src='<?php echo 'http://tabloidjubi.com/img_berita/'.$row->gambar; ?>'/></p>
				    <p><?php echo $row->meta_description; ?></p>
				    ]]>
				
				</description>
				<!--
				<content>
				    <![CDATA[
				    <p><img src='<?php echo 'http://tabloidjubi.com/img_berita/'.$row->gambar; ?>'/></p>
				    <p><?php echo $row->isi; ?></p>
				    ]]>
				</content> -->
			</item>
		<?php endforeach; ?>

	</channel>
</rss>