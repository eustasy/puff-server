find ./ -name '*.php' -exec php -l {} \;

if find ./ -name '*.php' -exec php -l {} \; |grep -v 'No syntax error'
then
	echo 'There are PHP errors.'
	exit 1;
fi
