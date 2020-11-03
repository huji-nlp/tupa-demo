#!/usr/bin/env bash

VERSION=1.3.10
MODEL=sparse  # ucca-bilstm
wget https://github.com/huji-nlp/tupa/releases/download/v$VERSION/$MODEL-$VERSION.tar.gz
tar xvzf $MODEL-$VERSION.tar.gz
export SPACY_MODEL=en_core_web_sm  # en_core_web_lg
export PARSER_MODEL=models/$MODEL
export PARSER_TYPE=sparse
export IP=0.0.0.0
echo localhost:5001 >server_name.txt
python -m spacy download $SPACY_MODEL
until python parse_server.py -vv; do
  echo Re-running server...
  sleep 10
done
