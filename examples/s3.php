<?PHP
	// Include the S3 class
	require_once("../class.s3.php");

	// Connect to our Eucalyptus cloud
	$s3     = new S3('VDLDDBCWULGVANN5JTZVJ','oRdT95sFhUy81HreTjkt3XiKHs60BWEEm2CQRlqG','walrus.jeevanullas.in:8773','/services/Walrus');	

	// List all buckets we have
	$buckets = $s3->listBuckets();
	print_r ($buckets);

	// Create a bucket on Walrus
	$return = $s3->createBucket('php-aws-sdk');
	
	// List all buckets we have, this should show the new bucket?
	$buckets = $s3->listBuckets();
	print_r ($buckets);

	// Get location of the bucket : Does not seem to work with Eucalyptus
	//	$location = $s3->getBucketLocation('php-aws-sdk');
	//	echo $location."\n";

	// Lets put a sample file in the bucket
	$return = $s3->uploadFile('php-aws-sdk', 'file123', '/tmp/file123');

	// Lets get the object info , we uploaded above
	$info = $s3->getObjectInfo('php-aws-sdk', 'file123');
	echo $info."\n";

	// Lets download the file from the bucket
	$return = $s3->downloadFile('php-aws-sdk', 'file123', '/opt/file123');

	// Lets delete the object now
	$return = $s3->deleteObject('php-aws-sdk', 'file123');

	// Delete the bucket we created
	$return = $s3->deleteBucket('php-aws-sdk');

	

?>
