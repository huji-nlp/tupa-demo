#!/usr/bin/env bash

wget https://github.com/huji-nlp/tupa/releases/download/v1.3.10/ucca-bilstm-1.3.10.tar.gz
tar xvzf ucca-bilstm-1.3.10.tar.gz
export SPACY_MODEL=en_core_web_lg
export PARSER_MODEL=models/ucca-bilstm
export PARSER_TYPE=bilstm
export IP=0.0.0.0
echo localhost:5001 >server_name.txt
until python server/parse_server.py -vv; do
  echo Re-running server...
  sleep 10
done
