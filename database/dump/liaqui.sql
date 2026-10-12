--

-- PostgreSQL database dump

--



\restrict Ft2Lcg8YkYFFwZ2n9fG73I3SD1ggQ2lGV9OZigva3h6seDqTum8q45xBgZ4ihlB



-- Dumped from database version 18.6

-- Dumped by pg_dump version 18.6



SET statement_timeout = 0;

SET lock_timeout = 0;

SET idle_in_transaction_session_timeout = 0;

SET transaction_timeout = 0;

SET client_encoding = 'UTF8';

SET standard_conforming_strings = on;

SELECT pg_catalog.set_config('search_path', '', false);

SET check_function_bodies = false;

SET xmloption = content;

SET client_min_messages = warning;

SET row_security = off;



SET default_tablespace = '';



SET default_table_access_method = heap;



--

-- Name: autores; Type: TABLE; Schema: public; Owner: -

--



CREATE TABLE public.autores (

    id bigint NOT NULL,

    nome character varying(150) NOT NULL,

    created_at timestamp(0) without time zone,

    updated_at timestamp(0) without time zone

);





--

-- Name: autores_id_seq; Type: SEQUENCE; Schema: public; Owner: -

--



CREATE SEQUENCE public.autores_id_seq

    START WITH 1

    INCREMENT BY 1

    NO MINVALUE

    NO MAXVALUE

    CACHE 1;





--

-- Name: autores_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -

--



ALTER SEQUENCE public.autores_id_seq OWNED BY public.autores.id;





--

-- Name: livros; Type: TABLE; Schema: public; Owner: -

--



CREATE TABLE public.livros (

    id bigint NOT NULL,

    titulo character varying(150) NOT NULL,

    autor character varying(150) NOT NULL,

    isbn character varying(20),

    editora character varying(100),

    ano_publicacao integer,

    sinopse text,

    numero_paginas integer,

    created_at timestamp(0) without time zone,

    updated_at timestamp(0) without time zone

);





--

-- Name: livros_id_seq; Type: SEQUENCE; Schema: public; Owner: -

--



CREATE SEQUENCE public.livros_id_seq

    START WITH 1

    INCREMENT BY 1

    NO MINVALUE

    NO MAXVALUE

    CACHE 1;





--

-- Name: livros_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -

--



ALTER SEQUENCE public.livros_id_seq OWNED BY public.livros.id;





--

-- Name: migrations; Type: TABLE; Schema: public; Owner: -

--



CREATE TABLE public.migrations (

    id integer NOT NULL,

    migration character varying(255) NOT NULL,

    batch integer NOT NULL

);





--

-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: -

--



CREATE SEQUENCE public.migrations_id_seq

    AS integer

    START WITH 1

    INCREMENT BY 1

    NO MINVALUE

    NO MAXVALUE

    CACHE 1;





--

-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -

--



ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;





--

-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: -

--



CREATE TABLE public.personal_access_tokens (

    id bigint NOT NULL,

    tokenable_type character varying(255) NOT NULL,

    tokenable_id bigint NOT NULL,

    name text NOT NULL,

    token character varying(64) NOT NULL,

    abilities text,

    last_used_at timestamp(0) without time zone,

    expires_at timestamp(0) without time zone,

    created_at timestamp(0) without time zone,

    updated_at timestamp(0) without time zone

);





--

-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: -

--



CREATE SEQUENCE public.personal_access_tokens_id_seq

    START WITH 1

    INCREMENT BY 1

    NO MINVALUE

    NO MAXVALUE

    CACHE 1;





--

-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -

--



ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;





--

-- Name: resenhas; Type: TABLE; Schema: public; Owner: -

--



CREATE TABLE public.resenhas (

    id bigint NOT NULL,

    texto text NOT NULL,

    datapublicacao date DEFAULT CURRENT_DATE NOT NULL,

    created_at timestamp(0) without time zone,

    updated_at timestamp(0) without time zone

);





--

-- Name: resenhas_id_seq; Type: SEQUENCE; Schema: public; Owner: -

--



CREATE SEQUENCE public.resenhas_id_seq

    START WITH 1

    INCREMENT BY 1

    NO MINVALUE

    NO MAXVALUE

    CACHE 1;





--

-- Name: resenhas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -

--



ALTER SEQUENCE public.resenhas_id_seq OWNED BY public.resenhas.id;





--

-- Name: sessions; Type: TABLE; Schema: public; Owner: -

--



CREATE TABLE public.sessions (

    id character varying(255) NOT NULL,

    user_id bigint,

    ip_address character varying(45),

    user_agent text,

    payload text NOT NULL,

    last_activity integer NOT NULL

);





--

-- Name: autores id; Type: DEFAULT; Schema: public; Owner: -

--



ALTER TABLE ONLY public.autores ALTER COLUMN id SET DEFAULT nextval('public.autores_id_seq'::regclass);





--

-- Name: livros id; Type: DEFAULT; Schema: public; Owner: -

--



ALTER TABLE ONLY public.livros ALTER COLUMN id SET DEFAULT nextval('public.livros_id_seq'::regclass);





--

-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: -

--



ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);





--

-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: -

--



ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);





--

-- Name: resenhas id; Type: DEFAULT; Schema: public; Owner: -

--



ALTER TABLE ONLY public.resenhas ALTER COLUMN id SET DEFAULT nextval('public.resenhas_id_seq'::regclass);





--

-- Data for Name: autores; Type: TABLE DATA; Schema: public; Owner: -

--



INSERT INTO public.autores (id, nome, created_at, updated_at)
VALUES
    (3, 'Machado de Assis', '2026-10-11 23:11:33', '2026-10-11 23:11:33');





--

-- Data for Name: livros; Type: TABLE DATA; Schema: public; Owner: -

--



INSERT INTO public.livros (id, titulo, autor, isbn, editora, ano_publicacao, sinopse, numero_paginas, created_at, updated_at)
VALUES
    (3, 'Memórias Póstumas de Brás Cubas', 'Machado de Assis', NULL, NULL, 1881,
     'Brás Cubas narra suas memórias após a morte, refletindo sobre sua vida e a sociedade.',
     NULL, '2026-10-11 22:38:18', '2026-10-11 22:38:18'),
    (5, 'Dom Casmurro', 'Machado de Assis', NULL, NULL, 1899,
     'Bentinho relembra sua relação com Capitu e apresenta sua versão dos acontecimentos.',
     NULL, '2026-10-11 22:40:03', '2026-10-11 22:40:03');





--

-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: -

--



COPY public.migrations (id, migration, batch) FROM stdin;
1	2026_09_06_145816_create_livros_table	1
2	2026_09_06_150034_create_autores_table	1
3	2026_09_06_150155_create_resenhas_table	1
4	2026_09_06_161756_create_sessions_table	1
5	2026_10_11_214453_create_personal_access_tokens_table	2
\.





--

-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: -

--



COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
\.





--

-- Data for Name: resenhas; Type: TABLE DATA; Schema: public; Owner: -

--



INSERT INTO public.resenhas (id, texto, datapublicacao, created_at, updated_at)
VALUES
    (10, 'Gostei da ironia do narrador em Memórias Póstumas de Brás Cubas. A forma como ele conta sua vida torna a leitura interessante e provoca reflexões sobre suas escolhas.',
     '2026-10-12', '2026-10-12 00:51:19', '2026-10-12 00:51:19');





--

-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: -

--



COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
u2ICmOMEoI3HgRGQrv9FvZZSwDBDfB2Bg7TjsWgY	\N	172.20.0.1	Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36	eyJfdG9rZW4iOiJ3NDJmYkxvVWZGTmE1WndlVnpsa0JTdDA2Z0xaYzZ2WGRHbnRqUVFhIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDgwXC9hdXRvcmVzIiwicm91dGUiOiJhdXRvcmVzLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=	1791768632
\.





--

-- Name: autores_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -

--



SELECT pg_catalog.setval('public.autores_id_seq', 3, true);





--

-- Name: livros_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -

--



SELECT pg_catalog.setval('public.livros_id_seq', 7, true);





--

-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -

--



SELECT pg_catalog.setval('public.migrations_id_seq', 5, true);





--

-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -

--



SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);





--

-- Name: resenhas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -

--



SELECT pg_catalog.setval('public.resenhas_id_seq', 10, true);





--

-- Name: autores autores_pkey; Type: CONSTRAINT; Schema: public; Owner: -

--



ALTER TABLE ONLY public.autores

    ADD CONSTRAINT autores_pkey PRIMARY KEY (id);





--

-- Name: livros livros_isbn_unique; Type: CONSTRAINT; Schema: public; Owner: -

--



ALTER TABLE ONLY public.livros

    ADD CONSTRAINT livros_isbn_unique UNIQUE (isbn);





--

-- Name: livros livros_pkey; Type: CONSTRAINT; Schema: public; Owner: -

--



ALTER TABLE ONLY public.livros

    ADD CONSTRAINT livros_pkey PRIMARY KEY (id);





--

-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: -

--



ALTER TABLE ONLY public.migrations

    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);





--

-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: -

--



ALTER TABLE ONLY public.personal_access_tokens

    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);





--

-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: -

--



ALTER TABLE ONLY public.personal_access_tokens

    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);





--

-- Name: resenhas resenhas_pkey; Type: CONSTRAINT; Schema: public; Owner: -

--



ALTER TABLE ONLY public.resenhas

    ADD CONSTRAINT resenhas_pkey PRIMARY KEY (id);





--

-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: -

--



ALTER TABLE ONLY public.sessions

    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);





--

-- Name: personal_access_tokens_expires_at_index; Type: INDEX; Schema: public; Owner: -

--



CREATE INDEX personal_access_tokens_expires_at_index ON public.personal_access_tokens USING btree (expires_at);





--

-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: -

--



CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);





--

-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: -

--



CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);





--

-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: -

--



CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);





--

-- PostgreSQL database dump complete

--



\unrestrict Ft2Lcg8YkYFFwZ2n9fG73I3SD1ggQ2lGV9OZigva3h6seDqTum8q45xBgZ4ihlB


