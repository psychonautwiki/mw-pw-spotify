<?php
    class PWSpotify {
        public static function onParserSetup(&$parser) {
            $parser->setFunctionHook( 'spotify', 'PWSpotify::renderEmbed' );
        }

        public static function renderEmbed($parser, $input, $width, $height, $format, $size, $theme) {
            $width = is_nan($width) ? $width : 300;
            $height = is_nan($height) ? $height : 380;

            $format = $format === 'coverart' ? 'coverart' : 'list';
            $size = $size === 'compact' ? 'compact' : 'large';
            $theme = $theme === 'light' ? 'light' : 'dark';

            if ($size === 'compact') {
                $height = 80;
            }

            $embed = '<iframe src="https://embed.spotify.com/?uri=' . htmlspecialchars($input) . '&theme=' . $theme . '&view=' . $format . '" width="' . $width . '" height="' . $width . '" frameborder="0" allowtransparency="true"></iframe>';

            return array(
                $embed,
                'noparse' => true, 'isHTML' => true
            );
        }
    }
?>
