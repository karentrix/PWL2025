{ pkgs }: {
	deps = [
		  pkgs.redis
    	pkgs.php82
      pkgs.php82Packages.composer
	];
}