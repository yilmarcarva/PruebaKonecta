PGDMP                         {         	   Cafeteria    15.4    15.4                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            	           1262    16398 	   Cafeteria    DATABASE     �   CREATE DATABASE "Cafeteria" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Colombia.1252';
    DROP DATABASE "Cafeteria";
                postgres    false            �            1259    16447 	   productos    TABLE     \  CREATE TABLE public.productos (
    id integer NOT NULL,
    nombreproducto character varying(30) NOT NULL,
    referencia character varying(100) NOT NULL,
    precio numeric NOT NULL,
    peso numeric NOT NULL,
    categoria character varying(100) NOT NULL,
    stock integer NOT NULL,
    fechacreacion date DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.productos;
       public         heap    postgres    false            �            1259    16446    productos_id_seq    SEQUENCE     �   CREATE SEQUENCE public.productos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.productos_id_seq;
       public          postgres    false    215            
           0    0    productos_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.productos_id_seq OWNED BY public.productos.id;
          public          postgres    false    214            �            1259    16462    ventas    TABLE     �   CREATE TABLE public.ventas (
    id integer NOT NULL,
    idproducto integer NOT NULL,
    nombreproducto character varying(30) NOT NULL,
    cantidad numeric NOT NULL,
    observaciones character varying(100)
);
    DROP TABLE public.ventas;
       public         heap    postgres    false            �            1259    16461    ventas_id_seq    SEQUENCE     �   CREATE SEQUENCE public.ventas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.ventas_id_seq;
       public          postgres    false    217                       0    0    ventas_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.ventas_id_seq OWNED BY public.ventas.id;
          public          postgres    false    216            j           2604    16450    productos id    DEFAULT     l   ALTER TABLE ONLY public.productos ALTER COLUMN id SET DEFAULT nextval('public.productos_id_seq'::regclass);
 ;   ALTER TABLE public.productos ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    214    215    215            l           2604    16465 	   ventas id    DEFAULT     f   ALTER TABLE ONLY public.ventas ALTER COLUMN id SET DEFAULT nextval('public.ventas_id_seq'::regclass);
 8   ALTER TABLE public.ventas ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    216    217    217                      0    16447 	   productos 
   TABLE DATA           r   COPY public.productos (id, nombreproducto, referencia, precio, peso, categoria, stock, fechacreacion) FROM stdin;
    public          postgres    false    215   �                 0    16462    ventas 
   TABLE DATA           Y   COPY public.ventas (id, idproducto, nombreproducto, cantidad, observaciones) FROM stdin;
    public          postgres    false    217   �                  0    0    productos_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.productos_id_seq', 19, true);
          public          postgres    false    214                       0    0    ventas_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.ventas_id_seq', 17, true);
          public          postgres    false    216            n           2606    16455    productos productos_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.productos
    ADD CONSTRAINT productos_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.productos DROP CONSTRAINT productos_pkey;
       public            postgres    false    215            p           2606    16469    ventas ventas_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.ventas
    ADD CONSTRAINT ventas_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.ventas DROP CONSTRAINT ventas_pkey;
       public            postgres    false    217            q           2606    16470    ventas ventas_idproducto_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.ventas
    ADD CONSTRAINT ventas_idproducto_fkey FOREIGN KEY (idproducto) REFERENCES public.productos(id);
 G   ALTER TABLE ONLY public.ventas DROP CONSTRAINT ventas_idproducto_fkey;
       public          postgres    false    3182    217    215               �   x�34�p�ag?��P�`NcSN#΀ļĔԢ�k�##c]K]Cc.C#�N�B�*�9�B]�M�4P����P�8��f�$�)�	�|�]<�<�]A��1B�c�K�)�&4?��6ߔx�����AA�Q�`�qu�p����Q���j��M��.v�[Ԏ��(&�a� �9X�!vKa��3�B}B<}!шd���=... �N�9         �   x�uO�
�0}N�"_ fm7�KEa��LA����6�|	=���200���B�'��ِ�ǉ��4e�ʹ��vyט�-�@>�Dτ��9�ȧHC�� �I�w���`+��qQի�2�ѦB�`=��t�P�?A���Fu�N5�D|@�C�     