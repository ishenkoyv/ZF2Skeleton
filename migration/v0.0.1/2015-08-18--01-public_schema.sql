--liquibase formatted sql

--changeset ishenkoyv:v0.0.1_2015-08-18--01-public_schema context:test,prod runOnChange:false

-- object: public.page_id_seq | type: SEQUENCE --
-- DROP SEQUENCE IF EXISTS public.page_id_seq CASCADE;
CREATE SEQUENCE public.page_id_seq
    INCREMENT BY 1
    MINVALUE 0
    MAXVALUE 2147483647
    START WITH 1
    CACHE 1
    NO CYCLE
    OWNED BY NONE;
-- ddl-end --
ALTER SEQUENCE public.page_id_seq OWNER TO zf2skeleton;
-- ddl-end --


-- object: public.page | type: TABLE --
-- DROP TABLE IF EXISTS public.page CASCADE;
CREATE TABLE public.page(
    page_id smallint NOT NULL DEFAULT nextval('public.page_id_seq'::regclass),
    name varchar(255) NOT NULL,
    content text NOT NULL,
    CONSTRAINT page_pk PRIMARY KEY (page_id)

);
-- ddl-end --
ALTER TABLE public.page OWNER TO zf2skeleton;
-- ddl-end --


