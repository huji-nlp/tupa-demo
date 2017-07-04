<?php
$output = shell_exec("(echo $_POST["input"] | /cs/nlp/danielh/workspace/ucca_dynet/.virtualenv/bin/python /cs/nlp/danielh/workspace/ucca_dynet/parsing/parse.py -c mlp -m models/ucca_mlp -WeCLM /cs/nlp/danielh/workspace/ucca_dynet/doc/toy.xml)");
echo "<pre>$output</pre>";
?>
