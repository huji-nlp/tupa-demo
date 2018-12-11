<?php
private function downloadFile($url, $path)
{
    $newfname = $path;
    $file = fopen ($url, 'rb');
    if ($file) {
        $newf = fopen ($newfname, 'wb');
        if ($newf) {
            while(!feof($file)) {
                fwrite($newf, fread($file, 1024 * 8), 1024 * 8);
            }
        }
    }
    if ($file) {
        fclose($file);
    }
    if ($newf) {
        fclose($newf);
    }
}
header("Content-type: text/plain; charset=utf-8");
$data = $_POST["input"];
$suffix =  date(DATE_ATOM);
$in_file = "/tmp/uids_" . $suffix . ".txt";
$out_file = "/tmp/xids_" . $suffix . ".txt";
file_put_contents($in_file, $data);
$venv = "/tmp/venv_" . $suffix;
$python3 = exec("which python3");
echo $python3;
$ucca = "/cs/nlp/danielh/workspace/ucca";
echo shell_exec("python3 -m venv $venv 2>&1");
downloadFile("https://bootstrap.pypa.io/get-pip.py", "get-pip.py");
echo file_put_contents("get-pip.py");
echo shell_exec("$venv/bin/python get-pip.py 2>&1)");
echo shell_exec("$venv/bin/pip install tqdm 2>&1");
//putenv("PYTHONPATH=$ucca:" . $_ENV["PYTHONPATH"]);
//echo shell_exec("$venv/bin/python $ucca/scripts/ucca_db_download.py $in_file -nx $out_file 2>&1");
unlink($in_file);
echo file_get_contents($out_file);
unlink($out_file);
?>
