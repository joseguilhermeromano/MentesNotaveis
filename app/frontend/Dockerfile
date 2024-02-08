# Estágio de desenvolvimento
FROM node:latest as develop

USER root
RUN npm install -g npm@10.4.0 --unsafe-perm=true --allow-root

RUN addgroup --gid 1023 app
RUN adduser --uid 1023 --ingroup app --system app
RUN mkdir /app && chown -R app:app /app
USER app
WORKDIR /app

COPY package*.json ./
# Add `/app/node_modules/.bin` to $PATH
ENV PATH /app/node_modules/.bin:$PATH

USER root
RUN npm install --force && npm cache clean --force 

USER app
COPY . .

EXPOSE 3000
# Deploy app for local development
CMD npm start --disableHostCheck true
