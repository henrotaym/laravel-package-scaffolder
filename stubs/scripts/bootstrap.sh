#!/bin/bash

./scripts/set_env.sh && \
docker compose build && \
./cli composer install && \
./cli bun install && \
npx lefthook install