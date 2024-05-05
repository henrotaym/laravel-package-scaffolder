FROM oven/bun:1 as bun

WORKDIR /opt/apps/app

COPY package.json bun.lockb ./

RUN bun install

COPY . .

# ----------------------------------

FROM node:21-alpine3.18 as cli

RUN apk add --no-cache shadow

# Host user data
ARG UID=1000
ARG GID=1000

# Match host user to avoid volumes permission issues
RUN usermod  --uid ${UID} --non-unique node && \
  groupmod --gid ${GID} --non-unique node

USER node

WORKDIR /opt/apps/app

COPY --chown=node:node --from=bun /opt/apps/app .

# ----------------------------------

FROM bun as runner

CMD bun run dev
