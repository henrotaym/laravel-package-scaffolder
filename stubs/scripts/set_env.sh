#!/bin/bash

append() {
  echo $1=\"$2\" >> .env
}

true > .env && \
append UID $(id -u) && \
append GID $(id -g)