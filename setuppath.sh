#!/usr/bin/bash

# @todo check for gitpod env and skip if not gitpod
export COMPOSER_PATH=$THEIA_WORKSPACE_ROOT/vendor/bin

export PATH=$PATH:$COMPOSER_PATH
